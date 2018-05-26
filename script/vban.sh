#!/bin/bash

case "$1" in
start)
   echo "Started">log-$2.txt
   vban_`cat args-$2.txt` &>> log-$2.txt &
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
   echo "Stopped">>log-$2.txt
   ;;
plugin)
   cd ../plugins/$2/
   bash $2.sh ${@:3}
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
   echo "Usage: $0 {start|args|remove|status|plugin}"
esac

exit 0
