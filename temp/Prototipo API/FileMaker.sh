DIR="/tmp/"
FILE=$1
TXT=$3
PATH=$DIR$FILE

touch $PATH
echo $TXT > $PATH

echo $PATH
