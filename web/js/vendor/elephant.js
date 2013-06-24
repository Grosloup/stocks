(function(){
    var root = this;

    var Elephant, _e_;
    var nativeIsArray = Array.isArray;

    Elephant = _e_ = root._e_ = root.Elephant = {};

    _e_.isArray = nativeIsArray || function(obj){
        return toString.call(obj) == '[object Array]';
    };

    _e_.forEach = function(datas, callback){
        if(_e_.isArray(datas)){
            var i= 0, len=datas.length;
            for(;i<len;i++){
                callback(i,datas[i]);
            }
        }
    };

    _e_.oid = 1;

    var Collection = _e_.Collection = function(){
        this._collection = [];
    };

    Object.defineProperties(Collection.prototype,{
        length: {
            value: function(){
                return this._collection.length;
            }
        },
        push: {
            value: function(datas){
                var c = this._collection;
                _e_.forEach(datas._collection, function(index,item){
                    c.push(item);
                });
            }
        },
        add: {
            value: function(val){
                this._collection.push(val);
            },
            enumerable: true
        },
        remove:{
            value: function(child){
                var c = this._collection;
                var i = null;
                _e_.forEach(c, function(index,item){
                    if(item.hasOwnProperty("oid")){
                        if(item.oid == child.oid){
                            i = index;
                        }
                    }
                });
                if(i){
                    c.splice(i,1);
                }

            },
            enumerable: true
        },
        find: {
            value: function(oid){
                var result=null;
                 _e_.forEach(this._collection, function(index,item){
                     if(item.hasOwnProperty("oid")){
                         if(item.oid == oid){
                             result =  item;
                         }
                     }
                });
                return result;
            }
        },
        findById: {
            value: function(id){
                var r = null;
                _e_.forEach(this._collection, function(i,item){
                    if(item.params.hasOwnProperty("id")){
                        if(item.params.id == id){
                            r = item;
                        }
                    }
                });
                return r;
            },
            enumerable: true
        },
        toArray: {
            value: function(){
                return this._collection;
            }
        }
    });

}).call(this);
