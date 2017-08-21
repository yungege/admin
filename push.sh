#!/bin/sh
read -t 60 -p "请输入备注信息:" msg
if [ ! -n "$msg" ]; then  
  msg="default msg"  
fi
echo "备注：$msg"

git pull
git add --all
git commit -m 't'
git push origin master
git pull
