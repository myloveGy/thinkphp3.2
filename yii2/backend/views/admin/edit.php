<div class="hide">
    <div id="user-profile-3" class="user-profile row">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="well well-sm">
                <div class="inline middle blue bigger-110"> 你已经完成配置信息的70% </div>
                &nbsp; &nbsp; &nbsp;
                <div style="width:60%;" data-percent="70%" class="inline middle no-margin progress progress-striped active">
                    <div class="progress-bar progress-bar-success" style="width:70%"></div>
                </div>
            </div>

            <div class="space"></div>

            <form class="form-horizontal">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-16">
                        <li class="active">
                            <a data-toggle="tab" href="#edit-basic">
                                <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                                基本信息
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#edit-password">
                                <i class="blue ace-icon fa fa-key bigger-125"></i>
                                密码
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content profile-edit-tab-content">
                        <div id="edit-basic" class="tab-pane in active">
                            <h4 class="header blue bolder smaller">基本</h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <input type="file" />
                                </div>

                                <div class="vspace-12-sm"></div>

                                <div class="col-xs-12 col-sm-8">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-username">账号名</label>
                                        <div class="col-sm-8">
                                            <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Username" value="<?=$user->username?>" />
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-first">真实姓名</label>
                                        <div class="col-sm-8">
                                            <input class="input-small" type="text" id="form-field-first" placeholder="性" value="liu" />
                                            <input class="input-small" type="text" id="form-field-last" placeholder="名" value="jinxing" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-date">生日</label>

                                <div class="col-sm-9">
                                    <div class="input-medium">
                                        <div class="input-group">
                                            <input class="input-medium date-picker" id="form-field-date" type="text" data-date-format="yyyy-mm-dd" placeholder="2016-06-01" />
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">性别</label>
                                <div class="col-sm-9">
                                    <label class="inline">
                                        <input name="form-field-radio" type="radio" class="ace" />
                                        <span class="lbl middle"> 男 </span>
                                    </label>

                                    &nbsp; &nbsp; &nbsp;
                                    <label class="inline">
                                        <input name="form-field-radio" type="radio" class="ace" />
                                        <span class="lbl middle"> 女 </span>
                                    </label>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-comment">座右铭</label>
                                <div class="col-sm-9">
                                    <textarea id="form-field-comment"></textarea>
                                </div>
                            </div>
                            <div class="space"></div>
                            <h4 class="header blue bolder smaller">内容信息</h4>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-email">电子邮件</label>
                                <div class="col-sm-9">
									<span class="input-icon input-icon-right">
										<input type="email" id="form-field-email" value="alexdoe@gmail.com" />
										<i class="ace-icon fa fa-envelope"></i>
									</span>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-website">个人主页</label>
                                <div class="col-sm-9">
									<span class="input-icon input-icon-right">
										<input type="url" id="form-field-website" value="http://www.liujinxing.com/" />
										<i class="ace-icon fa fa-globe"></i>
									</span>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-facebook">Facebook</label>
                                <div class="col-sm-9">
									<span class="input-icon">
										<input type="text" value="facebook_alexdoe" id="form-field-facebook" />
										<i class="ace-icon fa fa-facebook blue"></i>
									</span>
                                </div>
                            </div>
                            <div class="space-4"></div>
                        </div>
                        <div id="edit-password" class="tab-pane">
                            <div class="space-10"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">新密码</label>
                                <div class="col-sm-9">
                                    <input type="password" id="form-field-pass1" />
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">确认密码</label>

                                <div class="col-sm-9">
                                    <input type="password" id="form-field-pass2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            保存
                        </button>
                        &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            重置
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
