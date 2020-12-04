const fs= require('fs')
const csv= require('fast-csv')
const stream= fs.createReadStream('data_set.csv')

const streamCsv=csv().on('data',data=>console.log(data))
stream.pipe(streamCsv)

