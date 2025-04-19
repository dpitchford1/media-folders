# ADR Template

> Date: 2025-04-19 14:49:08 UTC  
> Author: [@dpitchford1](https://github.com/dpitchford1)  
> Status: Draft  
> Deciders: [@dpitchford1](https://github.com/dpitchford1)  
> ADR Number: 0000

## Title

Architecture Decision Record (ADR) template for Media Folders Plugin rebuild.

## Context

This is a template for creating ADRs. Each ADR should be saved in the `docs/architecture` directory with the format `NNNN-title-with-dashes.md` where `NNNN` is a sequential number starting from 0001.

## Decision

When creating a new ADR, copy this template and follow these guidelines:

### Metadata
```yaml
Date: YYYY-MM-DD HH:MM:SS UTC
Author: [@username](https://github.com/username)
Status: [Proposed | Accepted | Deprecated | Superseded]
Deciders: [@username](https://github.com/username)
ADR Number: NNNN
Technical Story: [description | ticket/issue URL]
```

### Required Sections

#### Context
What is the issue that we're seeing that is motivating this decision or change?

#### Decision
What is the change that we're proposing and/or doing?

#### Consequences
What becomes easier or more difficult to do because of this change?

### Optional Sections

#### Alternatives Considered
What other options were considered and why weren't they chosen?

#### Implementation Notes
Any specific notes on the implementation that might be helpful.

#### Related Decisions
List any related architecture decisions with their ADR numbers.

#### References
Any external references, articles, documentation, etc.

## Example Usage

```markdown
# 0001 Use WordPress REST API for Media Operations

> Date: 2025-04-19 14:49:08 UTC
> Author: [@dpitchford1](https://github.com/dpitchford1)
> Status: Proposed
> Deciders: [@dpitchford1](https://github.com/dpitchford1)
> ADR Number: 0001
> Technical Story: Improve media operation performance

## Context

Current media operations are using direct database queries and admin-ajax.php, 
leading to performance issues with large media libraries.

## Decision

We will migrate all media operations to use the WordPress REST API with custom 
endpoints for folder operations.

## Consequences

### Positive
- Better performance through modern HTTP caching
- Standardized API interface
- Better error handling
- Easier to test

### Negative
- Need to implement proper authentication
- Migration effort for existing functionality
- Additional learning curve for team

## Implementation Notes

1. Create new REST API endpoints under `/wp-json/media-folders/v1/`
2. Implement proper nonce verification
3. Add rate limiting for large operations
```

## Notes

- Keep each ADR focused and concise
- Use clear, unambiguous language
- Include code examples when relevant
- Update the status as the decision evolves
- Link to related issues or pull requests
- Use proper Markdown formatting

## References

- [Michael Nygard's ADR Template](https://github.com/joelparkerhenderson/architecture-decision-record/blob/main/templates/decision-record-template-by-michael-nygard/index.md)
- [MADR Template](https://adr.github.io/madr/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)

---

This template is based on established ADR formats, adapted for WordPress plugin development.