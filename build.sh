#!/bin/bash
set -x
env

rm -fr output
mkdir output
cp -fr config console data function install lib static templates tmp web config.php db.cfg.php function.php appSec.yml index.php start.sh  output/
