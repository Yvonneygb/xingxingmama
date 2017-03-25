(function () {
    /**
     *
     * 配置规则
     *  fv.set_rules('username','required');
     *     var config = [
     *         {
     *              field:'username',
     *              rules:'required|max_lenght[5]'
     *          },
     *          {
     *              field:'email',
     *              rules:'email'
     *          },
     *       ];
     *     
     *  fv.set_rules(config);
     * 
     * 开始验证
     * fv.run() == false;验证失败
     *
     * 即时验证
     * fv.instant_verification();
     *
     * @param obj 
     * 示例：
     *  {
     *      expand_filters:{},
     *      筛选器
     *      name ：function(val,str){ return bool} ,
     *      val value需要进行筛选的字符串
     *      str  筛选器自定义参数
     *      return bool值
     *
     *      expand_err_msg:{}
     *      错误提示信息
     *      filter_name 对应的筛选器名称
     *      msg 提示信息
     *      filter_name : msg ,
     *
     *  }
     *
     *  带有fv-name 属性的标签 显示错误
     */
    function Form_validation(obj)
    {   
        if (obj) 
        {   

            this.form = obj.form;
            if(obj.expand_filters)this.expand_filters = obj.expand_filters;
            if(obj.expand_err_msg)this.expand_err_msg = obj.expand_err_msg;
        }

        this.rules_data = {};

        var set_err_msg = function (name, display, msg) 
        {
            var err_box = document.querySelectorAll('[fv-' + name + ']')[0];
            if (!err_box) 
            {
                console.warn('显示错误的标签错误');
                return;
            }

            err_box.style.display = display;
            err_box.innerHTML = msg || '';
        }

        this.run = function () 
        {
            var rules_data = this.star();

            var validation_status = true;
            
            for (var item in rules_data)
            {
                for(var result in rules_data[item].results)
                {
                    if (!rules_data[item].results[result])
                    {
                        validation_status = false;

                        var msg = rules_data[item].err_msg[result];

                        set_err_msg(item, 'block', msg);

                        break;
                    } 
                }

                var element = document.getElementsByName(item)[0];
                element.item = item;
                element.onfocus = function () 
                {
                    set_err_msg(this.item,'none')

                }
            }

            return validation_status;
        }

        this.instant_verification = function () 
        {
            
        }


        
    }

    Form_validation.prototype =
    {
        //验证规则配置
        filters:
        {
            required: function (val)
            {
                return (val.trim() != '');
            },
            max_lenght: function (val, str)
            {
                return (val.length <= str);
            },
            min_length: function (val, str)
            {
                return (val.length >= str);
            },
            exact_length: function (val, str)
            {
                return (val == str);
            },
            number:function(val)
            {
            	return (!isNaN(val));
            },
            email:function(val)
            {	
                var regex = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
                return(val.length > 0 ? regex.test(val) : true);
            }
        },

        //验证失败信息
        err_msg:
        {
            required : '不能为空',
            max_lenght : '超出最大长度',
            min_length : '长度不足',
            exact_length : '长度不匹配',
            num : '请输入数字',
            email : '邮箱格式错误'
        },
        //拓展
        expand_filters:{},

        expand_err_msg:{},

        rules_data:{},

        //提交验证表单
        star:function () 
        {
            //如果没有验证规则，则什么也不做
            if (this._is_empty_object(this.rules_data)) 
            {
                return;
            }

            for (var item in this.rules_data)
            {

                var element = document.getElementsByName(this.rules_data[item].field)[0];

                if(!element)
                {
                    console.warn('未找到需要匹配的元素');
                    return;
                }
                
                //value
                this.rules_data[item].val = element.value;  

                this._execute(this.rules_data[item]);          
            }
        
            return this.rules_data;
        },

        //设定规则并储存
        set_rules : function(field, rules)
        {   
            //如果第一个参数是个数组而不是单独的字符串，我们循环遍历它，并递归调用此函数
            if (Array.isArray(field))
            {
                for (var i = 0; i < field.length; i++) 
                {
                    this.set_rules(field[i].field, field[i].rules);
                }
                return;
            }

            //没有设置规则，则不执行
            if (!rules)
             {
                console.warn("请输入验证规则");
                return;
             }

            if ('string' == typeof rules)
             {
                rules = rules.split('|');
             }

            this.rules_data[field] = 
            {
                field:field,
                rules:rules
            }
        },


        _execute:function (item) 
        {
            var param = null, rule = null, match = null, result = true, err_msg= null;
            item.err_msg = {};
            item.results = {};

            for (var i = 0; i < item.rules.length; i++) 
            {
                rule = item.rules[i]
                match = item.rules[i].match(/(.*?)\[(.*)\]/);

                if (match != null) 
                {
                    rule = match[1];
                    param = match[2];
                }

                //拓展过滤器器高于内定过滤器
                if (rule in this.expand_filters) 
                {
                    result = this.expand_filters[rule](item.val, param);
                } 
                else if(rule in this.filters)
                {   
                    result = this.filters[rule](item.val, param)
                }

                item.results[rule] = result;

                if(rule in this.expand_err_msg)
                {
                    err_msg = this.expand_err_msg[rule];
                }
                else if(rule in this.err_msg)
                {
                    err_msg = this.err_msg[rule];
                }

                item.err_msg[rule] = err_msg;
            }
        },

        _is_empty_object:function (v) 
        {
            for(var k in v)
            {
                return false;
            }
            return true;
        }
    }

    window.Form_validation = Form_validation;
})();