DIR="/tmp/"
FILE=$1
TXT=$3
PATH=$DIR$FILE

#touch $PATH
printf "$TXT" > $PATH

echo $PATH
