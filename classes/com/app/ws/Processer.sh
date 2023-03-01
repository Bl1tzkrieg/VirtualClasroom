TYPE=$1
FILE=$2
OUT=$FILE.out

PROCESSOR=echo
POSPROCESSOR=" "

case $TYPE in
    "python")
	PROCESSOR="python3.7"
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
