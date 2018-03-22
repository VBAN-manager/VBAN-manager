#!/bin/bash

case "$1" in
start)
   vban_`cat args-$2.txt` &
   echo $!>$2.pid
   ;;
args)
   echo ${@:3}>args-$2.txt
   ;;
remove)
   rm args-$2.txt
   ;;
stop)
   kill `cat $2.pid`
   rm $2.pid
   ;;
status)
   if [ -e $2.pid ]; then
      echo vban server is running, pid=`cat $2.pid`
   else
      echo vban server is NOT running
      exit 1
   fi
   ;;
*)
   echo "Usage: $0 {start|args|remove|status}"
esac

exit 0
