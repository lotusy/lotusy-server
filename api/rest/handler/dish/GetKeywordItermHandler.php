<?php
class GetKeywordItermHandler extends UnauthorizedRequestHandler {

    public function handle($params) {
        $terms = ItermDao::getTypeLanguageCodes(ItermDao::TYPE_KEYWORD, $params['language']);

        $response = array();
        $response['status'] = 'success';
        $response['terms'] = $terms;

        return $response;
    }
}
?>