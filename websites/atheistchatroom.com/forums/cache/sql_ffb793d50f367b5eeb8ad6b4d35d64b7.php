<?php exit; ?>
1367538761
SELECT m.*, u.user_colour, g.group_colour, g.group_type FROM (atheist_moderator_cache m) LEFT JOIN atheist_users u ON (m.user_id = u.user_id) LEFT JOIN atheist_groups g ON (m.group_id = g.group_id) WHERE m.display_on_index = 1
6
a:0:{}