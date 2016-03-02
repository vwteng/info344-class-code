package main

import (
    "github.com/vwteng/info344-class-code/gotypes/structs/person"
)

func main() {
    prs := person.Person{FirstName: "Vivian", LastName: "Teng"}
    prs.FirstName = "Dr"

    prs.SayHello()
}