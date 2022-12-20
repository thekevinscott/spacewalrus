package phpRemoting {
	/* By Josh Strike // josh@joshstrike.com // Use freely and enjoy! */
	import flash.events.*;
	import flash.net.NetConnection;
	import flash.net.ObjectEncoding;
	import flash.display.Sprite;
	import flash.net.Responder;
	import phpRemoting.*;
	import flash.display.Stage;
	
	
	public dynamic class phpAccess extends Sprite {
		private var resLimit:Number;
		private var callLabel:String;
		private var callWas:Object;
		
		public var gurl:String;
		public var st:Stage;
		public var netDebug:Boolean;
		private var r:Object;
		private var handle:String;
		
		public function phpAccess(gurl:String,st:Stage,netDebug:Boolean,mw:Number,mh:Number,resLimit:Number) {
			this.resLimit = resLimit;
			this.mw = mw;
			this.mh = mh;
			this.record = new Array();
			this.gurl = gurl;
			this.r = r;
			this.handle = handle;
			this.rs = new NetConnection();
						/*USING AMF0 IS RECOMMENDED AT LEAST UNTIL AMFPHP 2.0 SETTLES ISSUES WITH RECORDSETS & ARRAYS IN THE SAME CALL!!!*/
						this.rs.objectEncoding = flash.net.ObjectEncoding.AMF0;
						/* */
			this.rs.connect(this.gurl);
		}
		public function recordResult(rType:String, toFunction:Function, serviceClass:String, dataStr:String) {
			//trace ("Record "+rType+"\r"+serviceClass+"\r"+dataStr);
			callLabel = serviceClass+" "+rType;
			callWas = {rType:String, serviceClass:serviceClass, label:callLabel, dataStr:dataStr, toFunction:toFunction};
			if (this.record.length>resLimit) {
				this.record.shift();
			}
			this.record.push(callWas);
			if (this.resViewer) {
				this.resViewer.updateBox();
			}
		}
	}
		
}