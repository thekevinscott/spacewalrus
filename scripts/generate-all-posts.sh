#!/bin/bash

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )


python3 -m venv env
source env/bin/activate
python3 -m pip install pandas
python3 $SCRIPT_DIR/generate-all-posts.py
