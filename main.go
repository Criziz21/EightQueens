package main

import "fmt"

// type el struct {
// 	X int
// 	Y int
// }
// var elms [8]el
// for i := 0; i < 8; i++ {
// 		elms[i] = el{
// 			X: 10,
// 			Y: i,
// 		}
// 	}


func canAttack(i, j int, elms *[8]int) bool {
	return true
}

func Place(elms *[8]int) {
	for i := 0; i < 8; i++ {
		for j := 0; j < 8; j++ {
			if canAttack(i, j, elms) {
				elms[i] = j
			}
		}
	}
}

func EightQueens() {
	var elms [8]int
	Place(&elms)
	fmt.Println(elms)
}

func main() {
	EightQueens()
}
