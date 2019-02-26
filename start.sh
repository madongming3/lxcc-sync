#!/bin/sh
sip=`ifconfig -a|grep inet|grep -v 127.0.0.1|grep -v inet6|awk '{print $2}'|tr -d "addr:"`
if [ "$sip" == "192.168.0.177" ];then
    exit 1
fi
if [ "$sip" == "192.168.0.178" ];then
    exit 1
fi
