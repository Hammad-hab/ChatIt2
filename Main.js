
class request {
    constructor(url, type, Message, client) {
        this.type = type;
        this.url = url;
        this.Message = Message;
        this.client = client;

    }
    sendReq(rt) {
        try {
            $.ajax({
                url: this.url,
                data: { 'Mess': this.Message, 'client': this.client, 'RequestType': 'SET'},
                type: this.type,
                success: function () {
                   console.log('Success')
                }
            })
        } catch (error) {
            console.error('Failed to send request to ' + this.url + '.')
        }
    }


}

