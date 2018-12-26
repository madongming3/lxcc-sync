                    <form action="{$smarty.const.ROBOT_ACTION_DOCREATE}" method="post" id="robot_form">
					    <div class="control-group error" style="display:none">
                            <label class="control-label" for="inputError">Input with error</label>
                            <div class="controls">
                                <input type="text" id="inputError">
                                <span class="help-inline">Please correct the error</span>
                            </div>
                        </div>
                        <div class="info-list">
							<em>robot服务名称  ：</em>
							<div class="InputInner">
                                <input type="text" name="{$smarty.const.ROBOT_INPUT_NAME}" value="{$item[$smarty.const.ROBOT_INFO_KEY_DESC]}" tabindex="1"/ class="span1">
							    <div class="error" style="display:none"></div>
                            </div>
						</div>
						<div class="info-list" id="ip_url">
							<em>IP地址  ：</em>
							<div class="InputInner">
                                <input type="text" name="{$smarty.const.ROBOT_INPUT_IP}" value="{$item[$smarty.const.ROBOT_INFO_KEY_IP]}"  tabindex="1" class="span1"/>
								<div class="error" style="display:none"></div>
                            </div>
						</div>
						<div class="info-list" id="host_port">
							<em>端口  ：</em>
							<div class="InputInner">
                                <input type="text" name="{$smarty.const.ROBOT_INPUT_PORT}" value="{if $item[$smarty.const.ROBOT_INFO_KEY_PORT]}{$item[$smarty.const.SYNC_SERVER_INFO_KEY_PORT]}{else}22{/if}"  tabindex="1" class="span1"/>
								<div class="error" style="display:none"></div>
                            </div>
						</div>
						<div class="info-list" id="prefix" >
							<em>文件部署根路径  ：</em>
							<div class="InputInner">
                                <input type="text" name="{$smarty.const.ROBOT_INPUT_PREFIX}" value="{$item[$smarty.const.ROBOT_INFO_KEY_WWWROOT]}"  tabindex="1" class="span1"/>
								<div class="error" style="display:none"></div>
                            </div>
						</div>
						<div class="info-list">
							<em>用  户   名  ：</em>
							<div class="InputInner">
                                <input type="text" name="{$smarty.const.ROBOT_INPUT_USER_NAME}" value="{$item[$smarty.const.ROBOT_INFO_KEY_USERNAME]|escape}" tabindex="1" class="span1"/>
								<div class="error" style="display:none"></div>
                            </div>
						</div>
						<div class="info-list">
							<em>密　　码 ：</em>
							<div class="InputInner">
                                <input type="password" name="{$smarty.const.ROBOT_INPUT_PASSWORD}" tabindex="1" value="{$item[$smarty.const.ROBOT_INFO_KEY_PASSWORD]|escape}" class="span1">
								<div class="error" style="display:none"></div>
                            </div>
						</div>
						<div class="info-list">
							<em>状　　态 ：</em>
							<div class="chooses Mtop10">
                                <input type="radio" {if $item[$smarty.const.SVN_INFO_KEY_CLOSE] == $smarty.const.ROBOT_CLOSE_FALSE}checked="true"{/if} name="{$smarty.const.ROBOT_INPUT_IS_DEL}" tabindex="1" value="{$smarty.const.ROBOT_CLOSE_FALSE}"> 启用　
                                <input type="radio" {if $item[$smarty.const.SVN_INFO_KEY_CLOSE] == $smarty.const.ROBOT_CLOSE_TRUE}checked="true"{/if}name="{$smarty.const.ROBOT_INPUT_IS_DEL}" tabindex="1" value="{$smarty.const.ROBOT_CLOSE_TRUE}"> 停用
                            </div>
						</div>
                        <input type="hidden" name="id" value="{$smarty.const.CONSOLE_ID}" tabindex="3"/>
						<div class="info-submit"><input type="submit" value="下一步" tabindex="2" class="btn"></div>
					</form>
				</div>
			</div>
		</div>
	</div>