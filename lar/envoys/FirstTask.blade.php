@setup
    $server = $server ? [$server] : ['local', 'stg'];
@endsetup

@story('deploy')
    test
    test2
@endstory

@task('test', ['on' => $server])
    ls
@endtask

@task('test2', ['on' => $server])
    ls -la
@endtask

@after
    echo "Task: {$task} completed";
@endafter
