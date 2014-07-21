#!/bin/sh
##-------------------------------------------------------------------
## @copyright 2013 UnitedStack Co,.Ltd
## File : crontab_git_pull.sh
## Author : filebat <markfilebat@126.com>
## Description :
## --
## Created : <2013-09-05>
## Updated: Time-stamp: <2014-07-21 00:13:11>
##-------------------------------------------------------------------
# */10 * * * * source /etc/profile; (/var/www/html/wordpress2/tool/crontab_git_pull.sh 2>&1) 1>> /tmp/crontab_git_pull.log

function log()
{
    local msg=${1?}
    echo -ne `date +['%Y-%m-%d %H:%M:%S']`" $msg\n"
}

function update_git()
{
    dir=${1?}
    log "git pull $dir"
    cd $dir && git pull
}

basedir=$(dirname $0)

export http_proxy='http://192.168.1.184:3128/'
export https_proxy='http://192.168.1.184:3128/'

update_git $basedir

# Add watermark to pictures
cd $basedir/../wp-content/uploads/denny
for f in `ls origin/*`; do composite -dissolve 50% -gravity southeast -quality 100 watermark.png $f $(basename $f); done

## File : crontab_git_pull.sh ends
