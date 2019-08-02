<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?php echo \S::safeHTML(\S::forHTML($this->data['fileName'])); ?></title>
    <style>
        body {
            border: 0;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    </style>
</head>

<body>
<div id="placeholder"></div>
<script type="text/javascript"
        src="<?php echo gluePath(self::getSetting('serverURL'), '/web-apps/apps/api/documents/api.js'); ?>"></script>
<script>
    var innerAlert = function (message) {
        if (console && console.log)
            console.log(message);
    };

    var onReady = function () {
        innerAlert("Document editor ready");
    };

    var onDocumentStateChange = function (event) {
        var title = document.title.replace(/\*$/g, "");
        document.title = title + (event.data ? "*" : "");
    };

    var onError = function (event) {
        if (event) innerAlert(event.data);
    };

    var docEditor = new DocsAPI.DocEditor("placeholder", JSON.parse('<?php echo json_encode($config);?>'));
</script>
</body>
</html>
