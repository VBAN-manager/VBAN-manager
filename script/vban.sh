#!/bin/bash

case "$1" in
start)
   systemctl start vban@$2
   ;;
start-service)
   echo "Started as user:"
   whoami
   args="$(cat args-$2.txt)"
   echo "vban_$args"
   vban_$args
   ;;
args)
   echo ${@:3}>args-$2.txt
   ;;
remove)
   systemctl stop vban@$2
   rm args-$2.txt
   ;;
stop)
   systemctl stop vban@$2
   ;;
plugin)
   cd ../plugins/$2/
   bash $2.sh ${@:3}
   ;;
status)
   systemctl status vban@$2 -l
   ;;
is-active)
   systemctl is-active vban@$2
   ;;
#enable)
#   systemctl enable vban@$2
#   ;;
#disable)
#   systemctl enable vban@$2
#   ;;
*)
   echo "Usage: $0 {start|args|remove|status|plugin|is-active}"
esac

exit 0
