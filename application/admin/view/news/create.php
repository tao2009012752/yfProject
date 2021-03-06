{include file="public:header" /}
<style>
    select.inline{
        display: inline;
        width:200px;
    }
</style>
<div class="main_box">
    <h2><span></span>添加新闻</h2>
    <div class="cont_box">
        <form action="<{:url('news/create')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 选择分类：</label>
                    <select name="par_cate_id" class="inline">
                        <option value="0">请选择一级分类</option>
                    </select>
                    <select name="news_cate_id" class="inline">
                        <option value="0">请选择二级分类</option>
                    </select>
                </li>
                <li>
                    <label><span class="red">*</span> 新闻标题：</label>
                    <input type="text" placeholder="请输入新闻标题" name="title" />
                </li>
                <li id="upload">
                    <label><span class="red">*</span> 上传封面图：</label>
                    <img src="/assets/images/upload.png" width="100">
                    <input type="file" name="file" id="upimg" data-url="<{:url('third/upload')}>" />
                    <input type="hidden" name="cover" />
                </li>
                <li class="view-img" hidden>
                    <label >&nbsp;</label>
                    <img src="" style="max-width: 500px">
                </li>
                <li>
                    <label><span class="red">*</span> 新闻来源：</label>
                    <input type="text" placeholder="请输入新闻标题" name="source"  />
                </li>
                <li>
                    <label><span class="red">*</span> 新闻内容：</label>
                    <script id="container" name="content" type="text/plain" style="height:400px;float:left;width:800px"></script>
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加新闻" class="btn blue_btn"/>
            </div>

        </form>
    </div>
</div>
{include file="public:footer" /}
<script type="text/javascript" src="/assets/lib/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/assets/lib/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/assets/lib/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    $(function(){
        var cates = JSON.parse('<{$json_cates}>');

        var par_option = '<option value="0">请选择一级分类</option>';

        for (var i in cates)
        {
            if (cates[i]['parent_id'] == 0) {
                par_option += '<option value="'+cates[i]['news_cate_id']+'">'+cates[i].cate_name+'</option>';
            }
        }

        $("[name='par_cate_id']").html(par_option);


        $("[name='par_cate_id']").change(function()
        {
            var par_cate = $(this).val();

            var option = '<option value="0">请选择二级分类</option>';


            if (par_cate > 0) {
                for (var i in cates)
                {
                    if (cates[i]['parent_id'] == par_cate) {
                        option += '<option value="'+cates[i]['news_cate_id']+'">'+cates[i].cate_name+'</option>';
                    }
                }
            }

            $("[name='news_cate_id']").html(option);
        })

        var ue = UE.getEditor('container',{
            toolbars :[
                ['fullscreen', 'source', 'bold','italic', 'underline', 'strikethrough', 'removeformat', 'formatmatch', 'blockquote','pasteplain','forecolor','backcolor',  'fontfamily', 'fontsize',  'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', 'simpleupload']
            ],
            elementPathEnabled:false,
            wordCount:false
        });
    });
</script>
