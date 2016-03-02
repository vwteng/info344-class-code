package main

import (
    "fmt"
    "os"
    "encoding/csv"
    "log"
    "io"
)

type tabulation struct {
    RecordsTotal int
    RecordsDistinct int
    HighestPopulation int
}

func main() {
    csvfile, err := os.Open("zip_code_database.csv")
    
    if err != nil {
        log.Fatal(err)
    } else {
        reader := csv.NewReader(csvfile)
        for {
            record, err := reader.Read()
            if err == io.EOF {
                break
            }
            if err != nil {
                log.Fatal(err)
            }
            fmt.Println(record)
            
            
            for idx, r := range record {
                fmt.Println(idx, string(r))
            }
            
        }
    }
    
    defer csvfile.Close()
}

