#!/bin/sh
#$Id: dumpsql.sh,v 1.6 2003/06/12 19:01:26 robbat2 Exp $
MYSQL=/usr
[ -d /usr/local/mysql ] && MYSQL=/usr/local/mysql
MYSQL_BIN=${MYSQL}/bin
MYSQLDUMP=${MYSQL_BIN}/mysqldump
OPTS="--all --add-drop-table --compress --databases"
DBS="rats"
USERNAME="rats"
SCHEMAFILENAME="schema.sql"
DATAFILENAME="data.sql"
DATAFILEGEN="--no-create-info --no-create-db --complete-insert"
SCHEMAFILEGEN="--no-data"
BADCOMMENTREMOVE="egrep -v '^---[-]*$'"
CLEANUPINSERT="sed -e 's/INSERT INTO/INSERT IGNORE INTO/g'"

PASSWORD="$1"
if [ -z "${PASSWORD}" ]; then
    echo -n "Enter password: "
    read -s PASSWORD
fi;

POPT="-p${PASSWORD}"
OPTS="${OPTS} ${POPT}"

echo "-- \$""Id""\$" >${SCHEMAFILENAME}
echo "-- \$""Id""\$" >${DATAFILENAME}
${MYSQLDUMP} ${OPTS} -u${USERNAME} ${DBS} ${SCHEMAFILEGEN} | eval ${BADCOMMENTREMOVE} | eval ${CLEANUPINSERT} >>${SCHEMAFILENAME}
${MYSQLDUMP} ${OPTS} -u${USERNAME} ${DBS} ${DATAFILEGEN} | eval ${BADCOMMENTREMOVE} | eval ${CLEANUPINSERT} >>${DATAFILENAME}
