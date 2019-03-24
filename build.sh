cmds:
  - name: 'list current dir'
    cmd: 'ls'
  - name: 'make output dir'
    cmd: 'mkdir -p output'
  - name: 'copy to output dir'
    cmd: 'cp -r config console data function install lib static templates tmp web config.php db.cfg.php function.php index.php start.sh appSpec.yml output'

# 抽包路径, 这个是必选项
out_dir: 'output'
