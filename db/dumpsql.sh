#!/bin/sh
#$Id: dumpsql.sh,v 1.1 2002/12/12 07:10:43 robbat2 Exp $
MYSQL=/usr/local/mysql
MYSQL_BIN=${MYSQL}/bin
MYSQLDUMP=${MYSQL_BIN}/mysqldump
OPTS="--all --add-drop-table --extended-insert --compress --databases -p"
DBS="rats"
USERNAME="rats"
SCHEMAFILENAME="schema.sql"
DATAFILENAME="data.sql"
DATAFILEGEN="--no-create-info --no-create-db"
SCHEMAFILEGEN="--no-data"

echo "-- \$""Id""\$" >${SCHEMAFILENAME}
echo "-- \$""Id""\$" >${DATAFILENAME}
${MYSQLDUMP} ${OPTS} -u${USERNAME} ${DBS} ${SCHEMAFILEGEN} >>${SCHEMAFILENAME}
${MYSQLDUMP} ${OPTS} -u${USERNAME} ${DBS} ${DATAFILEGEN} >>${DATAFILENAME}

#r/local/mysql/bin/mysqldump --all --add-drop-table --extended-insert --compress --databases -urats -pratty rats
