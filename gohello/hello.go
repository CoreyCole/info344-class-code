package main

import (
	"fmt"
	"os"
	"github.com/coreycole/info344-class-code/gohello/reverse"
)

func main() {
	//starts with a capital letter => imported from package
	fmt.Println(reverse.Reverse(os.Args[1]))
	fmt.Println(os.Args[0])
}