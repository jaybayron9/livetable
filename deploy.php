on: push
name: Deploy website on push
jobs:
  web-deploy:
    name: Deploy
    runs-on: ubunto-latest
    steps:
    - name: Get latest code
      uses: actions/checkout@v2.3.2

    - name: Synx files
      uses: samKirl