#!/bin/sh
#$Id: dumpsql.sh,v 1.2 2003/04/30 19:51:00 robbat2 Exp $
MYSQL=/usr/local/mysql
MYSQL_BIN=${MYSQL}/bin
MYSQLDUMP=${MYSQL_BIN}/mysqldump
PASSWORD="-p${1}"
OPTS="--all --add-drop-table --extended-insert --compress --databases ${PASSWORD}"
DBS="rats"
USERNAME="rats"
SCHEMAFILENAME="schema.sql"
DATAFILENAME="data.sql"
DATAFILEGEN="--no-create-info --no-create-db"
SCHEMAFILEGEN="--no-data"
BADCOMMENTREMOVE="egrep -v '^---[-]*$'"

echo "-- \$""Id""\$" >${SCHEMAFILENAME}
echo "-- \$""Id""\$" >${DATAFILENAME}
${MYSQLDUMP} ${OPTS} -u${USERNAME} ${DBS} ${SCHEMAFILEGEN} | ${BADCOMMENTREMOVE} >>${SCHEMAFILENAME}
${MYSQLDUMP} ${OPTS} -u${USERNAME} ${DBS} ${DATAFILEGEN} | ${BADCOMMENTREMOVE} >>${DATAFILENAME}
