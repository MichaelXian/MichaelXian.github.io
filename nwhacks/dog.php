<?php
$slack_webhook_url = "https://hooks.slack.com/services/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";
$icon_url = "https://cdn1.medicalnewstoday.com/content/images/articles/322/322868/golden-retriever-puppy.jpg";
$dog_url = "https://cdn1.medicalnewstoday.com/content/images/articles/322/322868/golden-retriever-puppy.jpg";
$dog_call = curl_init($dog_url);
$dog_response = curl_exec($dog_call);
curle_close($dog_call);


$data = array(
    "username" => "toxic_bot",
    "channel" => $channel_id,
    "text" => $message_text,
    "icon_url" => $icon_url,
    "parse" => "full",
    "response_type" => "in_channel",
    "text" => $dog_url,
    "attachments" => array(
        "image_url"=> $dog_url
    ),
    "unfurl_media" => true,
    "unfurl_links" => true
);
$json_string = json_encode($data);

$slack_call = curl_init($slack_webhook_url);
curl_setopt($slack_call, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($slack_call, CURLOPT_POSTFIELDS, $json_string);
curl_setopt($slack_call, CURLOPT_CRLF, true);
curl_setopt($slack_call, CURLOPT_RETURNTRANSFER, true);
curl_setopt($slack_call, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "Content-Length: " . strlen($json_string))
);

$result = curl_exec($slack_call);
curl_close($slack_call);
