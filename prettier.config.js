// prettier.config.js
export default {
    plugins: ["prettier-plugin-blade"],
    overrides: [
        {
            files: ["*.blade.php"],
            options: {
                parser: "blade",
            },
        },
    ],
};
