'use strict';

var connPool;

var Story = {
    //getAll: function() {}
    getAll() {
        var sql = `select * from stories 
            order by votes desc, createdOn desc limit 50`;
        return connPool.queryAsync(sql);
    }
};

module.exports.Model = function(connectionPool) {
    connPool = connectionPool;
    return Story;
}

