#!/bin/sh
# $Id: indent.sh,v 1.4 2003/03/13 10:48:15 robbat2 Exp $
# $Source: /code/convert/cvsroot/infrastructure/rats/Attic/indent.sh,v $
###########
# Experimental PHP code formatter
# -------------------------------
#
# Since there is a bug in the indent command mangling PHP tags, this replaces
# them with something first then handles it. It will probably totally mess up
# your HTML + CSS.
#

#start strings
ORG_BEGIN="<?php"
TMP_BEGIN="___PHPBEGIN___"

#end strings
ORG_END="?>"
TMP_END="___PHPEND___"

for i in $@; do
cat $i | sed "s/${ORG_BEGIN}/${TMP_BEGIN}/g;s/${ORG_END}/${TMP_END}/g;" >$i.sed
indent -nut -bap -br -ce -cli4 -ncs -ss -npcs -saf -sai -saw -nprs -bfda -psl -brs -lp -nbbo -hnl -i4 -ci4 -o $i.indent $i.sed
cat $i.indent | 
sed "s/${TMP_BEGIN}/${ORG_BEGIN}/g;s/${TMP_END}/${ORG_END}/g;" >$i.new
rm -rf $i.sed $i.indent
done;
