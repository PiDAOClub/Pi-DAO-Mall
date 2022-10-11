<?php
// +----------------------------------------------------------------------
// | ShopXO 国内领先企业级B2C免费开源电商系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011~2099 http://shopxo.net All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( https://opensource.org/licenses/mit-license.php )
// +----------------------------------------------------------------------
// | Author: Devil
// +----------------------------------------------------------------------
namespace app\plugins\membershiplevelvip\index;

use app\plugins\membershiplevelvip\service\BaseService;

/**
 * 会员等级增强版插件 - 公共
 * @author   Devil
 * @blog     http://gong.gg/
 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class Common
{
    protected $user_vip;
    protected $plugins_base;

    /**
     * 构造方法
     * @author  Devil
     * @blog    http://gong.gg/
     * @version 1.0.0
     * @date    2022-07-17
     * @desc    description
     * @param   [array]           $params [输入参数]
     */
    public function __construct($params = [])
    {
        // 参数赋值属性
        foreach($params as $k=>$v)
        {
            $this->$k = $v;
        }
    }

    /**
     * 登录校验
     * @author  Devil
     * @blog    http://gong.gg/
     * @version 1.0.0
     * @date    2019-08-15
     * @desc    description
     */
    protected function IsLogin()
    {
        if(empty($this->user))
        {
            if(IS_AJAX)
            {
                exit(json_encode(DataReturn('登录失效，请重新登录', -400)));
            } else {
                MyRedirect('index/user/logininfo', true);
            }
        }
    }

    /**
     * 公共用户数据
     * @author   Devil
     * @blog     http://gong.gg/
     * @version  1.0.0
     * @datetime 2019-12-29T15:58:21+0800
     * @desc     description
     */
    protected function CommonUserView()
    {
        // 基础配置
        $plugins_base = BaseService::BaseConfig();
        $this->plugins_base = $plugins_base['data'];
        MyViewAssign('plugins_base', $this->plugins_base);

        // 支付方式
        MyViewAssign('payment_list', BaseService::HomeBuyPaymentList());
    }
}
?>