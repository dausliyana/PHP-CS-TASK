<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stage'])) {
    $stage = $_POST['stage'];

    // Story progression (LONG VERSION)
    $stories = [
        // START
        "start" => [
            "title" => "The Hall of Beginnings",
            "subtitle" => "Where Fate is Decided",
            "content" => "You step into a vast hall. A booming voice whispers: 'Three doors lie ahead. Only two lead to salvation. One leads to instant death.'\n\nChoose wisely.",
            "choices" => [
                "door_crimson" => "Enter the Crimson Door 🔴",
                "door_sapphire" => "Enter the Sapphire Door 🔵",
                "door_obsidian" => "Enter the Obsidian Door ⚫"
            ],
            "image" => "hall.jpg"
        ],

        // DEADLY DOOR
        "door_crimson" => [
            "title" => "The Crimson Door",
            "subtitle" => "A Fiery Doom",
            "content" => "As you step forward, the door slams shut. Flames erupt, and laughter fills the air. 'You chose poorly!' The fire consumes you.\n\nYour journey ends here.",
            "choices" => [],
            "image" => "fire.jpg"
        ],

        // SAFE DOORS - PATH 1
        "door_sapphire" => [
            "title" => "The Sapphire Door",
            "subtitle" => "The Crystal Caverns",
            "content" => "You find yourself in a shimmering cavern filled with glowing crystals. Ahead lies a fork in the path. A crystal guardian appears and says:\n\n'Two paths, two fates. Choose your destiny.'",
            "choices" => [
                "crystal_left" => "Follow the Left Path (Glowing Blue) 🔵",
                "crystal_right" => "Follow the Right Path (Dark Shadow) ⚫"
            ],
            "image" => "cavern.jpg"
        ],
        "crystal_left" => [
            "title" => "The Left Path",
            "subtitle" => "The Bridge of Truth",
            "content" => "The blue path leads to a glowing bridge over an endless chasm. Halfway across, a riddle appears:\n\n'I have cities, but no houses. I have rivers, but no water. What am I?'",
            "choices" => [
                "answer_map" => "Answer: A Map 🗺️",
                "answer_ocean" => "Answer: The Ocean 🌊"
            ],
            "image" => "bridge.jpg"
        ],
        "answer_map" => [
            "title" => "Correct Answer",
            "subtitle" => "The Guardian Approves",
            "content" => "The bridge solidifies, and you safely cross. A golden door appears ahead.",
            "choices" => [
                "golden_door" => "Open the Golden Door ✨"
            ],
            "image" => "goldendoor.jpg"
        ],
        "answer_ocean" => [
            "title" => "Wrong Answer",
            "subtitle" => "The Fall",
            "content" => "The bridge crumbles beneath your feet, and you fall into the abyss. Your journey ends here.",
            "choices" => [],
            "image" => "fall.jpg"
        ],

        // SAFE DOORS - PATH 2
        "door_obsidian" => [
            "title" => "The Obsidian Door",
            "subtitle" => "The Labyrinth of Shadows",
            "content" => "You enter a dark labyrinth. Whispers guide you deeper into the maze. Suddenly, you find two torches on the wall: one white, one black.",
            "choices" => [
                "torch_white" => "Light the White Torch 🕯️",
                "torch_black" => "Light the Black Torch 🕯️"
            ],
            "image" => "maze.jpg"
        ],
        "torch_white" => [
            "title" => "The White Flame",
            "subtitle" => "A Friend in the Darkness",
            "content" => "The white flame reveals a hidden ally: a cloaked figure who says, 'I will guide you.' They lead you to an ancient library full of knowledge.",
            "choices" => [
                "library_search" => "Search the Library 📜",
                "follow_guide" => "Follow the Cloaked Guide 🔍"
            ],
            "image" => "library.jpg"
        ],
        "torch_black" => [
            "title" => "The Black Flame",
            "subtitle" => "The Shadow's Trap",
            "content" => "The black flame awakens a shadow beast that devours everything. The labyrinth collapses, and you are lost forever.",
            "choices" => [],
            "image" => "shadow.jpg"
        ],
        
        // VICTORY OR MORE STORY
        "golden_door" => [
            "title" => "The Treasure Room",
            "subtitle" => "Victory or Deception?",
            "content" => "You open the golden door and see a room filled with treasures. But something feels off. Do you take the treasure or leave?",
            "choices" => [
                "take_treasure" => "Take the Treasure 💰",
                "leave_room" => "Leave the Room 🚪"
            ],
            "image" => "treasure.jpg"
        ],
        "take_treasure" => [
            "title" => "The Curse of Greed",
            "subtitle" => "The End",
            "content" => "The moment you touch the treasure, it turns to dust, and the room collapses. You are trapped forever.",
            "choices" => [],
            "image" => "collapse.jpg"
        ],
        "leave_room" => [
            "title" => "The Escape",
            "subtitle" => "A Hero's Return",
            "content" => "You resist temptation and leave the treasure behind. A portal opens, leading you back to the real world. You have survived the journey.✨🎉",
            "choices" => [],
            "image" => "portal.jpg"
        ]
    ];

    $story = $stories[$stage] ?? ["title" => "Lost Path", "subtitle" => "The Void", "content" => "You wander aimlessly. There's no escape.", "choices" => [], "image" => "lost.jpg"];
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $story['title']; ?></title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $story['title']; ?></h1>
    <h3><?php echo $story['subtitle']; ?></h3>
    <p><?php echo nl2br($story['content']); ?></p>
    <img src="images/<?php echo $story['image']; ?>" style="width:50%;">

    <?php if ($story['choices']): ?>
        <form method="post" action="">
            <?php foreach ($story['choices'] as $key => $choice): ?>
                <button name="stage" value="<?php echo $key; ?>"><?php echo $choice; ?></button>
            <?php endforeach; ?>
        </form>
    <?php else: ?>
        <a href="index.html">Start Over</a>
    <?php endif; ?>
</body>
</html>
