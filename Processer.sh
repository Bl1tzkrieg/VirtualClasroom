TYPE=$1
FILE=$2
OUT=$FILE.out
TMP=$FILE.dump

INTERPRETER="TRUE"

PROCESSOR=echo
POSPROCESSOR=" "

BINDIR="/usr/local/bin/"


case $TYPE in
    "python")
	PROCESSOR="python3.7"
    ;;
    "ruby")
	PROCESSOR="ruby"
    ;;
    "echo") 
	PROCESSOR=echo
    ;;
    "lua") 
	PROCESSOR=luajit
    ;;
    "javascript") 
	PROCESSOR="node"
    ;;
    "c")
	mv $FILE $FILE.c
	FILE=$FILE.c
	PROCESSOR="../../bin/clang -s -o $OUT"
	POSPROCESSOR=./$OUT
	INTERPRETER="FALSE"
    ;;
    "cpp")
	mv $FILE $FILE.cpp
	FILE=$FILE.cpp
	PROCESSOR="../../bin/clang -s -o $OUT"
	POSPROCESSOR=./$OUT
	INTERPRETER="FALSE"
    ;;
    "fortran90")
	mv $FILE $FILE.f90
	FILE=$FILE.f90
	PROCESSOR="gfortran9 -s  -o $OUT"
	POSPROCESSOR=./$OUT
	INTERPRETER="FALSE"
    ;;
esac

case $INTERPRETER in
    "TRUE")
	$BINDIR$PROCESSOR $FILE
    ;;
    "FALSE")
	$BINDIR$PROCESSOR $FILE; $POSPROCESSOR 
    ;;
esac

