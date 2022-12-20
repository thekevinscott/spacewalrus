package phpRemoting {
	/* By Josh Strike // josh@joshstrike.com // Use freely and enjoy! */
	import flash.net.NetConnection;
	import flash.events.NetStatusEvent;
	import phpRemoting.*;

	import flash.net.Responder;
	public dynamic class phpCall {
				
		public function phpCall(phpAccessInstance:phpAccess, toFunction:Function, serviceClass:String, ... args) {
			this.serviceClass = serviceClass;
			this.toFunction = toFunction;
			this.phpAccessInstance = phpAccessInstance;

			var callStr:String = this.walk(args);
			
			this.phpAccessInstance.recordResult("Call", toFunction, serviceClass, callStr);
			var rsResponder:Responder = new Responder(convertData, handleError);
			this.phpAccessInstance.rs.addEventListener(NetStatusEvent.NET_STATUS,gotStatus,false,0,true);
			var c:Number = 2;
			var callArr:Array = new Array(serviceClass,rsResponder);
			for (var j:* in args) {
				callArr[c] = args[j];
				c++;
			}
			this.phpAccessInstance.rs.call.apply(this, callArr); 
		}
		public function handleError(fe:Object):void {
			this.phpAccessInstance.recordResult("Error", this.toFunction, this.serviceClass, 
										  String(fe.code+": "+fe.description+"\r in "+fe.details+" LINE "+fe.line));
		}
		public function gotStatus(event:Object):void {
			trace (event.info.code);
		}
		private function convRec(r:Object):Array {
			var rsArr:Array = new Array();
			var colCount:Number = r.serverInfo.columnNames.length;
			for (var row:Number=0;row<r.serverInfo.initialData.length;row++) {
				rsArr[row] = new Array();
				for (var colIndex:* in r.serverInfo.columnNames) {
					rsArr[row][r.serverInfo.columnNames[colIndex]] = r.serverInfo.initialData[row][colIndex];
				}
			}
			var retArr:Array = new Array(rsArr,this.walk(rsArr));
			return retArr;
		}
		public dynamic function convertData(re:Object):void {
			var log:String = "";
			var resultType:String;
			if (re is Number) {
				trace('int');
				//integer//
				resultType = "Number";
				var outN:Number = Number(re);
				log += String(re);
			} else if (re is String) {
				trace('string')
				resultType = "String";
				var outS:String = String(re);
				log += re;
			} else {
				var outA = Array;
				if (!("serverInfo" in re)) {
					resultType = "Array";
					outA = re;
					log += this.walk(re);
					for (var i:* in re) {
						if ("serverInfo" in re[i]) {
							var z:Array = convRec(re[i]);
							re[i] = z[0];
							log += i+" ::: SQL RESULT\r"+z[1];
						}
					}
				} else {
					//parse it as a recordSet//
					resultType = "RecordSet";
					var rsArr:Array = new Array();
					var colCount:Number = re.serverInfo.columnNames.length;
					for (var row:Number=0;row<re.serverInfo.initialData.length;row++) {
						rsArr[row] = new Array();
						for (var colIndex:* in re.serverInfo.columnNames) {
							rsArr[row][re.serverInfo.columnNames[colIndex]] = re.serverInfo.initialData[row][colIndex];
							//trace(rsArr[row][re.serverInfo.columnNames[colIndex]]);
							//trace(rsArr[temp]["content"]);
						}
					}
					//trace(rsArr[2]["content"]);
					log += this.walk(rsArr);
					outA = rsArr;
				}
			}
			var endRes:Object = new Object();
			endRes.log = log;
			switch (resultType) {
				case "Number":
					endRes.result = outN;
					break;
				case "String":
					endRes.result = outS;
					break;
				case "Array":
					endRes.result = outA;
					break;
				case "RecordSet":
					endRes.result = outA;
					break;
			}
			endRes.resultType = resultType;
			var finale:phpResult = new phpResult(endRes,this.toFunction);
			this.phpAccessInstance.recordResult("Result ::: "+resultType+" :::", this.toFunction, this.serviceClass, endRes.log);
			delete this.phpAccessInstance;
		}
		public function walk(re:Object) {
			this.output = "";
			var walkOut:String = this.walkAssoc(re,0);
			this.output = "";
			return walkOut;
		}
		private function walkAssoc(re:Object,depth:Number) {
			var space:String = "   ";
			var spaces:String = "";
			for (var d:Number=0;d<depth;d++) {
				spaces += space;
			}
			for (var c:* in re) {
				if (!(re[c] is String) && !(re[c] is Number) && c != "serverInfo") {
					this.output += spaces+"["+c+"] => \r";
					this.walkAssoc(re[c],depth+1);
				} else {
					this.output += spaces+"["+c+"] => "+re[c]+"\r";
				}
			}
			return (this.output);
		}
	}
}