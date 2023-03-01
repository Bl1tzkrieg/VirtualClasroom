TYPE=$1
FILE=$2
OUT=$FILE.out

PROCESSOR=echo
POSPROCESSOR=

case $TYPE in
    "python") 
	PROCESSOR=python 
    ;;
    "echo") 
	PROCESSOR=echo
    ;;
    "lua") 
	PROCESSOR=luajit
    ;;
    "js") 
	PROCESOR=nodejs
    ;;
    "C") 
	PROCESSOR="tcc -s -o $OUT"
	POSPROCESSOR=$OUT
    ;;
esac

$PROCESSOR $FILE ; $POSPROCESSOR
