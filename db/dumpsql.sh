#!/bin/sh
#$Id: dumpsql.sh,v 1.3 2003/05/29 04:01:26 robbat2 Exp $
MYSQL=/usr/local/mysql
MYSQL_BIN=${MYSQL}/bin
MYSQLDUMP=${MYSQL_BIN}/mysqldump
OPTS="--all --add-drop-table --extended-insert --compress --databases"
DBS="rats"
USERNAME="rats"
SCHEMAFILENAME="schema.sql"
DATAFILENAME="data.sql"
DATAFILEGEN="--no-create-info --no-create-db"
SCHEMAFILEGEN="--no-data"
BADCOMMENTREMOVE="egrep -v '^---[-]*$'"

echo -n "Enter password: "
read -s PASSWORD
POPT="-p${PASSWORD}"
OPTS="${OPTS} ${POPT}"
echo

echo "-- \$""Id""\$" >${SCHEMAFILENAME}
echo "-- \$""Id""\$" >${DATAFILENAME}
${MYSQLDUMP} ${OPTS} -u${USERNAME} ${DBS} ${SCHEMAFILEGEN} | ${BADCOMMENTREMOVE} >>${SCHEMAFILENAME}
${MYSQLDUMP} ${OPTS} -u${USERNAME} ${DBS} ${DATAFILEGEN} | ${BADCOMMENTREMOVE} >>${DATAFILENAME}
