#!/bin/sh
sip=`ifconfig -a|grep inet|grep -v 127.0.0.1|grep -v inet6|awk '{print $2}'|tr -d "addr:"`
if [ "$sip" == "192.168.0.68" ];then
 echo 'hello world'
fi
#if [ "$sip" == "192.168.0.66" ];then
 #   exit 1
#fi
#if [ "$sip" == "192.168.0.61" ];then
#    exit 1
#fi
echo 'hello world'
sleep 200
