#!/bin/bash



#ssh root@tk2-245-32227.vs.sakura.ne.jp


host=202.181.99.22
login_name=wall-mall
password=hp78xzbn75

#root/Valve

expect -c "
set timeout -1
spawn ssh -l $login_name $host
expect \"Are you sure you want to continue connecting (yes/no)?\" {
    send \"yes\n\"
    expect \"$login_name@$host's password:\"
    send \"$password\n\"
} \"$login_name@$host's password:\" {
    send \"$password\n\"
} \"Permission denied (publickey,gssapi-keyex,gssapi-with-mic).\" {
    exit
}
interact
"


