<?php
if(!function_exists('_user')){
    function _user($user_id)
    {
        $objUser = \App\Entities\User::find($user_id);
        if(!$objUser) {
            return abort(404);
        }

        return $objUser;
    }
}

if(!function_exists('_article')) {
    function _article($article_id)
    {
        $objArticle = \App\Entities\Article::find($article_id);
        if(!$objArticle) {
            return abort(404);
        }

        return $objArticle;
    }
}
