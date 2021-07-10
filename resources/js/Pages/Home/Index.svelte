<script context="module">
    import Layout, { title } from '@/Shared/Layout.svelte'
    export const layout = Layout
</script>

<script>
    import {inertia, page} from '@inertiajs/inertia-svelte';

    const { routes, hello, title:pageTitle, flash } = $page.props;

    let message = null;
    if (flash) {
        if (flash.messages) {
            if (flash.messages[0]) {
                message = flash.messages[0];
            }
        }
    }

    $title = "My Index"

    console.log($page);

</script>

<h1>{pageTitle}</h1>
<ul>
    <li>Around the {hello}</li>
</ul>
<a
use:inertia
href={routes.hello.uri}
>Click Here for Hello!</a>


{#if message}
    <p>
        {message.text}
    </p>
{/if}
