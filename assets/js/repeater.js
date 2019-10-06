/**
 * Created by Vitaliy Prokhonenkov <prokhonenkov@gmail.com>
 * Date 28.09.2019
 * Time 19:46
 */

jQuery(function($){
    window.Repeater = function(options){
        var $el = $(options.id),
            $btnNew = $el.children('.btn.new-item'),
            $additionalClientData = $el.children('.additional-client-data'),
            $wrap = $el.children('.list-items'),
            self = this;

        this.id = $wrap.children('.repeater-item').length;
        $btnNew.click(function () {
            var postData = options.postData;

            postData[yii.getCsrfParam()] = yii.getCsrfToken();
            postData['id'] = self.id;
            postData['additionalClientData'] = $additionalClientData.val();

            $.post(options.addNewUrl, postData, function(data){
                $wrap.append($(data));
                if(options.addCallback) {
                    setTimeout(function(){
                        eval(options.addCallback)(postData);
                    }, 100);
                }
            });
            self.id++;
        });

        $el.on('click', '.repeater-item .remove', function(){
            if(confirm('Do you really want to delete this item?')){
                var $item = $(this).closest('.repeater-item');
                var postData ={id:$item.data('id')};
                $item.remove();
                if(options.removeCallback) {
                    setTimeout(function(){
                        eval(options.removeCallback)(postData);
                    }, 100);
                }
            }
        });
    };
});