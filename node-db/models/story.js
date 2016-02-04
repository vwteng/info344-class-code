'use strict';

var connPool;

var Story = {
    getAll() {
        var sql = 'select * from stories order by votes desc, createdOn desc limit 50';
        return connPool.queryAsync(sql);
    },
    
    insert(story) {
        //validate data
        var sql = 'insert into stories (url) values (?)';
        var params = [story.url];
        return connPool.queryAsync(sql, params)
            .then(function(results) {
                sql = 'select * from stories where id=?';
                params = [results.insertId];
                return connPool.queryAsync(sql, params);
            })
            .then(function(rows) {
                return rows.length > 0 ? rows[0] : null;
            });
    },
    
    upVote(id) {
        var sql = 'update stories set votes=votes+1 where id=?';
        var params = [id];
        return connPool.queryAsync(sql, params)
            .then(function(results) {
                sql = 'select * from stories where id=?';
                return connPool.queryAsync(sql, params);
            })
            .then(function(rows) {
                return rows.length > 0 ? rows[0] : null;
            });
    }
};

module.exports.Model = function(connectionPool) {
    connPool = connectionPool;
    return Story;
}