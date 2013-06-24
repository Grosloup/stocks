var Category = function(params){
    this.params = params;
    this.oid = _e_.oid++;
    this._parent = null;
    this._children = new _e_.Collection();
};

Object.defineProperties(Category.prototype,{
    get: {
        value: function(name){
            if(this.params.hasOwnProperty(name)){
                return this.params[name];
            }
        },
        enumerable:true
    },
    set: {
        value: function(name, value){
            this.params[name] = value;
        },
        enumerable: true
    },
    has: {
        value: function(name){
            return this.params.hasOwnProperty(name);
        },
        enumerable:true
    },
    parent: {
        get: function(){
            return this._parent;
        },
        set: function(value){
            if(value instanceof Category){
                this._parent = value;
                value.addChild(this);
            }

        },
        enumerable: true
    },
    children: {
        get: function(){
            return this._children;
        },
        set: function(value){
            if(value instanceof _e_.Collection){
                if(this._children.length == 0){
                    this._children = value;
                } else {
                    this._children.push(value);
                }

            }
            if(value instanceof Category){
                this.addChild(value);
            }
        },
        enumerable:true
    },
    addChild: {
        value: function(child){
            if(child instanceof Category){
                this._children.add(child);
            }
        },
        enumerable:true
    },
    removeChild: {
        value: function(child){
            if(child instanceof Category){
                this._children.remove(child);
            }
        },
        enumerable:true
    }
});
