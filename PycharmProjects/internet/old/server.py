import os
from http.server import BaseHTTPRequestHandler, HTTPServer

HOST_NAME = '0.0.0.0'
PORT_NUMBER = 80

class HttpProcessor(BaseHTTPRequestHandler):
    def do_GET(self):
        path = self.path

        if "?res=" in path:
            f = open("index.html", "r")
            content = f.read()
            self.send_response(200)
            self.send_header('Content-type', 'text/html')
            self.end_headers()
            self.wfile.write(bytes(content, 'UTF-8'))

            #ip = self.client_address[0]
            #print(os.system("iptables -t mangle -A PREROUTING -s {} -j MARK --set-mark 2".format(ip)))
            #f = open("connect.html", "r")
            #content = f.read()
            #self.send_response(200)
            #self.send_header('Content-type', 'text/html')
            #self.end_headers()
            #self.wfile.write(bytes(content, 'UTF-8'))

        elif "." in path:
            try:
                f = open(path[1:], "rb")
                content = f.read()
                self.send_response(200)
                self.end_headers()
                self.wfile.write(content)
            except FileNotFoundError:
                content = ""
                self.send_response(404)
                self.send_header('Content-type', 'text/html')
                self.end_headers()
                self.wfile.write(bytes(content, 'UTF-8'))
        else:
            f = open("index.html", "r")
            content = f.read()
            self.send_response(200)
            self.send_header('Content-type', 'text/html')
            self.end_headers()
            self.wfile.write(bytes(content, 'UTF-8'))

if __name__ == '__main__':
    print("Стартую!")
    server_class = HTTPServer
    httpd = server_class((HOST_NAME, PORT_NUMBER), HttpProcessor)
    httpd.serve_forever()