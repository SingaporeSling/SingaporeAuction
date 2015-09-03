var AuctionObject = Object.create({}, {
    toJSON: {
        value: function() {
            return JSON.stringify(this);
        }
    }
});

var auction = (function(parent){
    var auction = Object.create(parent);

    Object.defineProperties(auction, {
        init: function(product, seller, buyer, currentBid, endTime){
            this.product = product;
            this.seller = seller;
            this.buyer = buyer;
            this.currentBid = currentBid;
            this.endTime = endTime;

            return this;
        },
        product: {
            get: function () {
                return this._product;
            },
            set: function (value) {
                this._product = value;
            }
        },
        seller: {
            get: function () {
                return this._seller;
            },
            set: function (value) {
                this._seller = value;
            }
        },
        buyer: {
            get: function () {
                return this._buyer;
            },
            set: function (value) {
                this._buyer = value;
            }
        },
        currentBid: {
            get: function () {
                return this._currentBid;
            },
            set: function (value) {
                this._currentBid = value;
            }
        },
        endTime: {
            get: function () {
                return this._endTime;
            },
            set: function (value) {
                this._endTime = value;
            }
        }
    });

    return auction;
}(AuctionObject));


var Category = Object.freeze({"Auto": 1, "Jewelry": 2, "Home": 3, "Art": 4, "Tech": 5, "Other": 6});
var product = (function(parent){
    var product = Object.create(parent);

    Object.defineProperties(product, {
        init: function(title, description, category, startBid){
            this.title = title;
            this.description = description;
            this.category = category;
            this.startBid = startBid;

            return this;
        },
        title: {
            get: function () {
                return this._title;
            },
            set: function (value) {
                if(Validator.validateName(value)) {
                    this._title = value;
                }
            }
        },
        description: {
            get: function () {
                return this._description;
            },
            set: function (value) {
                if(Validator.validateDescription(value)) {
                    this._description = value;
                }
            }
        },
        category: {
            get: function () {
                return this._category;
            },
            set: function (value) {
                switch(value) {
                    case Category.Auto:
                        this._category = "Auto";
                        break;
                    case Category.Jewelry:
                        this._category = "Jewelry";
                        break;
                    case Category.Home:
                        this._category = "Home";
                        break;
                    case Category.Art:
                        this._category = "Art";
                        break;
                    case Category.Tech:
                        this._category = "Tech";
                        break;
                    case Category.Other:
                        this._category = "Other";
                        break;
                    default:
                        this._category = "Other";
                }
            }
        },
        startBid: {
            get: function () {
                return this._startBid;
            },
            set: function (value) {
                if(value>0) {
                    this._startBid = value;
                }
            }
        }
    });

    return product;
}(AuctionObject));

var user = (function(parent){
    var user = Object.create(parent);

    Object.defineProperties(user, {
        init: function(firstName, lastName, email, password){
            this.firstName = firstName;
            this.lastName = lastName;
            this.email = email;
            this.password = password;

            return this;
        },
        firstName: {
            get: function () {
                return this._firstName;
            },
            set: function (value) {
                if(Validator.validateName(value)) {
                    this._firstName = value;
                }
            }
        },
        lastName: {
            get: function () {
                return this._lastName;
            },
            set: function (value) {
                if (Validator.validateName(value)) {
                    this._lastName = value;
                }
            }
        },
        email: {
            get: function () {
                return this._email;
            },
            set: function (value) {
                if(Validator.validateEmail(value)) {
                    this._email = value;
                }
            }
        },
        password: {
            get: function() {
                return null;
            },
            set: function(value) {
                if (Validator.validatePassword(value)) {
                    this._password = value;
                }
            }
        }
    });

    return user;
}(AuctionObject));

var bid = (function(parent) {
    var bid = Object.create(parent);

    Object.defineProperties(bid, {
        init: function(currentBid, oldBid) {
            this.oldBid = oldBid;
            this.bid = currentBid;

            return this;
        },
        oldBid: {
            get: function() {
                return this._oldBid;
            },
            set: function(value) {
                value = value * 1;
                this._oldBid = value;
            }
        },
        bid: {

            get: function() {
                return this._bid;
            },
            set: function(value) {
                if (Validator.validateBid(value, this.oldBid)) {
                    this._bid = bid;
                }
            }
        }
    });

    return bid;
}(AuctionObject));

