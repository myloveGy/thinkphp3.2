<?php
use app\modules\admin\widgets\FormWidget;
use app\modules\admin\widgets\TableWidget;
use app\modules\admin\widgets\OperateWidget;
use yii\helpers\Url;
?>
<h3 class="header smaller lighter blue"><?= $this->params['title'] ?></h3>
<div class="widget-box widget-color-blue ui-sortable-handle">
    <div class="widget-header">
        <h5 class="widget-title bigger lighter">
            <i class="ace-icon fa fa-desktop"></i>
            <?= $this->params['title'] ?>
        </h5>

        <!--颜色选择-->
        <div class="widget-toolbar widget-toolbar-light no-border">
            <select id="simple-colorpicker-1" class="hide">
                <option selected="" data-class="blue" value="#307ECC">#307ECC</option>
                <option data-class="blue2" value="#5090C1">#5090C1</option>
                <option data-class="blue3" value="#6379AA">#6379AA</option>
                <option data-class="green" value="#82AF6F">#82AF6F</option>
                <option data-class="green2" value="#2E8965">#2E8965</option>
                <option data-class="green3" value="#5FBC47">#5FBC47</option>
                <option data-class="red" value="#E2755F">#E2755F</option>
                <option data-class="red2" value="#E04141">#E04141</option>
                <option data-class="red3" value="#D15B47">#D15B47</option>
                <option data-class="orange" value="#FFC657">#FFC657</option>
                <option data-class="purple" value="#7E6EB0">#7E6EB0</option>
                <option data-class="pink" value="#CE6F9E">#CE6F9E</option>
                <option data-class="dark" value="#404040">#404040</option>
                <option data-class="grey" value="#848484">#848484</option>
                <option data-class="default" value="#EEE">#EEE</option>
            </select>
        </div>

        <!-- 默认操作按钮 -->
        <div class="widget-toolbar no-border">
            <a data-action="settings" href="#" class="add-data">
                <i class="ace-icon fa fa-plus"></i>
            </a>
            <a class="orange2" data-action="fullscreen" href="#">
                <i class="ace-icon fa fa-expand"></i>
            </a>
            <a data-action="reload" href="#" class="reload">
                <i class="ace-icon fa fa-refresh"></i>
            </a>
            <a data-action="collapse" href="#">
                <i class="ace-icon fa fa-chevron-up"></i>
            </a>
            <a data-action="close" href="#">
                <i class="ace-icon fa fa-times"></i>
            </a>
        </div>
    </div>

    <!--主要显示信息-->
    <div class="widget-body">
        <div class="widget-main no-padding">
            <div class="row">
                <div class="col-xs-12">
                    <table id="showTable" class="table table-striped table-bordered table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= FormWidget::widget(['labels' => $attributes, 'attributes' => $form_attributes]) ?>
<?= TableWidget::widget(['alias' => $alias, 'attributes' => $attributes]) ?>
<div id="dialog-confirm" class="is-hide">
    <div class="alert alert-info bigger-110 m-quest">
        你确定需要删除这条数据吗?
    </div>
</div>
<script type="text/javascript">
    $(window).ready(function(){
        // 表格样式转换
        $('#simple-colorpicker-1').ace_colorpicker({pull_right:true}).on('change', function(){
            var color_class = $(this).find('option:selected').data('class');
            var new_class = 'widget-box';
            if(color_class != 'default')  new_class += ' widget-color-'+color_class;
            $(this).closest('.widget-box').attr('class', new_class);
        });

        // 初始化表格信息
        var table = initDataTables('#showTable', {
            aoColumns: <?= $aoColumns ?>,
            bServerSide:true,
            sAjaxSource:'<?php echo Url::to([\Yii::$app->controller->id.'/get-data']); ?>',
        });

        // 添加搜索信息
        $('#showTable_filter').append('<?= $strSearch ?>');

        // 执行搜索
        $('.me-search').bind('keyup change', function () {
            table.column(parseInt($(this).attr('index'))).search($(this).val()).draw();
        });

        // 处理搜索信息
        $('#showTable_wrapper div.row div.col-xs-6:first').removeClass('col-xs-6').addClass('col-xs-2');
        $('#showTable_wrapper div.row div.col-xs-6:first').removeClass('col-xs-6').addClass('col-xs-10');

        // 页面刷新
        $('.reload').click(function(){
            table.draw(false);
        });

        // 表单验证
        $('.update-form').validate({
            highlight: function (e) {
                $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            },
            success: function (e) {
                $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                $(e).remove();
            },
            errorPlacement: function (error, element) {
                if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                    var controls = element.closest('div[class*="col-"]');
                    if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                }
                else if(element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                }
                else if(element.is('.chosen-select')) {
                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                }
                else error.insertAfter(element.parent());
            },
        });

        // dialog美化
        $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
            _title: function(title) {
                var $title = this.options.title || '&nbsp;'
                if( ("title_html" in this.options) && this.options.title_html == true )
                    title.html($title);
                else title.text($title);
            }
        }));

        // 添加
        $('.add-data').click(function(){
            $('.update-form-error').hide();
            initForm('.update-form');
            initDialog('.update-form', '添加<?= $this->params['title'] ?>', function(){
                // 添加处理
                formSubmit('.update-form', '<?= Url::to([\Yii::$app->controller->id.'/update']) ?>', 'add', function(json, objMe){
                    $('.update-form').dialog('close');
                    Alert(json.msg, function(){
                        table.draw(false);
                    });
                });
            });
        });

        // 编辑
        $('#showTable tbody').on('click', '.me-edit', function(){
            // 获取数据
            var data = table.row($(this).parents('tr')).data();
            initForm('.update-form', data);

            $('.update-form-error').hide();
            initDialog('.update-form', '修改<?= $this->params['title'] ?>', function(){
                // 添加处理
                formSubmit('.update-form', '<?= Url::to([\Yii::$app->controller->id.'/update']) ?>', 'edit', function(json, objMe){
                    $('.update-form').dialog('close');
                    Alert(json.msg, function(){
                        table.draw(false);
                    });
                });
            });
        });

        // 删除数据
        $('#showTable tbody').on('click', '.me-delete', function(){
            var me = this;

            initDialog('#dialog-confirm', '温馨提醒', function(){
            // 获取数据
            var tr = $(me).parents('tr'), data = table.row(tr).data();
            data.oper = 'del';
            initAjax('<?= Url::to([\Yii::$app->controller->id.'/update']) ?>', data, function(json){
                $('#dialog-confirm').dialog('close');
                var isSuccess = json.status == 1 ? 'success' : 'warning';
                Alert(json.msg, function(){
                    if (json.status == 1)
                    {
                        tr.empty();
                    }
                }, isSuccess);

            }, function(){
               alert('服务器繁忙,请稍候再试...');
            });
            }, {'content': ''}, 'quest');
        });

        // 查看详情
        $('#showTable tbody').on('click', '.me-info', function(){
            var tr = $(this).parents(tr), data = table.row(tr).data();
            for (var i in data) $('.data-info').find('.info-' + i).html(data[i]);
            initDialog('.data-info', '查看<?= $this->params['title'] ?>', function(){
                $('.data-info').dialog('close');
            })
        });
    });
</script>