class ControllerExtensionModuleMyAjax extends Controller
{
    public function index()
    {
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode(
            [
                "success" => true, 
                "message" => "ok", 
                "data" => []
            ]
        ));
    }
}