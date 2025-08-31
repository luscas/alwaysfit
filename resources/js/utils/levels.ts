export function getLevel(level: string) {
    switch (level) {
        case "beginner":
            return "Iniciante";
        case "intermediate":
            return "Intermediário";
        case "advanced":
            return "Avançado";
        default:
            return level;
    }
}
